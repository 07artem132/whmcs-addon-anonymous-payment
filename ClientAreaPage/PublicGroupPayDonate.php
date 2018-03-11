<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 10.12.2017
 * Time: 22:03
 */

namespace AnonymousPayment\ClientAreaPage;

use AnonymousPayment\Helper\HtmlHelper;
use AnonymousPayment\Traits\isRequestMethod;
use AnonymousPayment\Config\WHMCSUserConfig;
use AnonymousPayment\Controller\WHMCSFormController;
use AnonymousPayment\Controller\WHMCSClientController;
use AnonymousPayment\Controller\WHMCSServerController;
use AnonymousPayment\Abstracts\ClientAreaPageAbstract;
use AnonymousPayment\Controller\WHMCSServiceController;
use AnonymousPayment\Config\PublicGroupPayDonateConfig;
use AnonymousPayment\Interfaces\ClientAreaPageInterface;
use AnonymousPayment\Exceptions\InvalidAmountExceptions;
use AnonymousPayment\Controller\WHMCSClientAreaController;
use AnonymousPayment\Controller\ModuleStatisticsController;
use AnonymousPayment\Controller\WHMCSCustomFieldsController;
use \AnonymousPayment\Exceptions\ClientIDNotFoundExceptions;
use AnonymousPayment\Controller\WHMCSModuleGatewaysController;
use \AnonymousPayment\Exceptions\ClientEmailNotFoundExceptions;
use AnonymousPayment\Controller\WHMCSCustomFieldValueController;
use AnonymousPayment\Controller\MultiLanguageController as Lang;
use AnonymousPayment\Exceptions\GatewayModuleNameErrorExceptions;

class PublicGroupPayDonate extends ClientAreaPageAbstract implements ClientAreaPageInterface {

	use isRequestMethod;

	private $ClientArea,
		$Form,
		$ModuleGateway;

	function __construct() {
		$this->ClientArea    = new WHMCSClientAreaController();
		$this->ModuleGateway = new WHMCSModuleGatewaysController();
		$this->Form          = new WHMCSFormController();
	}

	function render() {
		ModuleStatisticsController::AddEventPageView( 'GroupPay' );

		$this->ClientArea->initPage();

		if ( $this->isRequestMethod( 'POST' ) && empty( $_POST['FormFill'] ) ) {
			try {
				echo $this->GenerateFormToPayForward();

				return;
			} catch ( ClientEmailNotFoundExceptions $e ) {
				$this->ClientArea->assign( "ClientEmailError", 1 );
			} catch ( ClientIDNotFoundExceptions $e ) {
				$this->ClientArea->assign( "ClientIDError", 1 );
			} catch ( GatewayModuleNameErrorExceptions $e ) {
				$this->ClientArea->assign( "GatewayModuleNameError", 1 );
			} catch ( InvalidAmountExceptions $e ) {
				$this->ClientArea->assign( "AmountError", 1 );
			}//TODO сделать обработку исключений с адресом ServerAddressError
		}


		$this->ClientArea->setTemplate( 'PublicGroupPayDonate' );
		$this->ClientArea->assign( "GatewaysList", $this->ModuleGateway->getAvailableGateways() );
		$this->ClientArea->assign( "MinAddBalanse", formatCurrency( WHMCSUserConfig::GetMinAddBalanse() ) );
		$this->ClientArea->assign( "MaxAddBalanse", formatCurrency( WHMCSUserConfig::GetMaxAddBalanse() ) );
		$this->ClientArea->assign( "MinAddBalanseNoFormat", (int) WHMCSUserConfig::GetMinAddBalanse() );
		$this->ClientArea->assign( "MaxAddBalanseNoFormat", (int) WHMCSUserConfig::GetMaxAddBalanse() );
		$this->ClientArea->assign( "DonateHost", PublicGroupPayDonateConfig::GetDonateHostStatus() );
		$this->ClientArea->assign( "DonateClientEmail", PublicGroupPayDonateConfig::GetDonateClientEmailStatus() );
		$this->ClientArea->assign( "DonateClientID", PublicGroupPayDonateConfig::GetDonateClientIDStatus() );
		$this->ClientArea->setPageTitle( Lang::Translate( 'BalanceAddWithoutAuthorization' ) );

		foreach ( $this->GetVars() as $key => $value ) {
			$this->ClientArea->assign( $key, $value );
		}

		$this->ClientArea->output();
	}

	function GenerateFormToPayForward() {
		$Amount            = (float) $_POST['Amount'];
		$PaymentType       = (int) $_POST['PaymentType'];
		$MessageRecipient  = 'Публичное пополнение баланса';
		$GatewayModuleName = $_POST['GatewayModuleName'];

		if ( ! array_key_exists( $GatewayModuleName, $this->ModuleGateway->GetAvailableGateways() ) ) {
			throw new GatewayModuleNameErrorExceptions();
		}

		if ( WHMCSUserConfig::GetMinAddBalanse() > $Amount || $Amount > WHMCSUserConfig::GetMaxAddBalanse() ) {
			throw new InvalidAmountExceptions();
		}

		if ( array_key_exists( 'MessageRecipientStatus', $_POST ) ) {
			$MessageRecipient = $_POST['MessageRecipient'];
		}

		switch ( $PaymentType ) {
			case 1 :
				$UserID = WHMCSClientController::Email( $_POST['ClientEmail'] )->id;
				break;
			case 2 :
				$ServerIP    = $_POST['ServerIP'];
				$ServerPort  = $_POST['ServerPort'];
				$ServerID    = WHMCSServerController::SearchByHostnameOrIP( $ServerIP )->id;
				$ServiceList = WHMCSServiceController::GetServiceAssignByServerID( $ServerID );
				$ListRelID   = $ServiceList->pluck( 'id' );
				$FieldID     = WHMCSCustomFieldsController::GetByName( PublicGroupPayDonateConfig::GetDonateHostCustomFieldsPort() )->id;
				$ServiceID   = WHMCSCustomFieldValueController::ServiceSearchByValueAndFieldIdAndRelIdList( $ServerPort, $FieldID, $ListRelID )->relid;
				foreach ( $ServiceList as $item ) {
					if ( $item->id == $ServiceID ) {
						$UserID = $item->client()->first()->id;
					}
				}
				break;
			case 3 :
				$UserID = WHMCSClientController::ID( $_POST['ClientID'] )->id;
				break;
			default:
				//TODO сделать исключение
				break;
		}

		$Form = $this->Form->form( $_SERVER['REQUEST_URI'] . 'forward' );
		$Form .= $this->Form->hidden( 'MessageRecipient', $MessageRecipient );
		$Form .= $this->Form->hidden( 'GatewayModuleName', $GatewayModuleName );
		$Form .= $this->Form->hidden( 'Amount', $Amount );
		$Form .= $this->Form->hidden( 'UserID', $UserID );
		$Form .= $this->Form->submit();
		$Form .= $this->Form->close();
		$Form .= HtmlHelper::OnLoadSubmit( 'frm1' );

		return $Form;
	}
}
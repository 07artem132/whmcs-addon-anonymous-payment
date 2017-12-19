<?php
/**
 * Created by PhpStorm.
 * User: Artem
 * Date: 17.12.2017
 * Time: 18:14
 */

namespace AnonymousPayment\ClientAreaPage;


class ExceptionPage {
	private function GeneratePageInvalidInvoiceIdRequested() {
		$this->ClientArea->initPage();
		$this->ClientArea->disableHeaderFooterOutput();
		$this->ClientArea->assign( 'invalidInvoiceIdRequested', true );
		$this->ClientArea->setTemplate( 'viewinvoice' );
		$this->ClientArea->output();
	}

}
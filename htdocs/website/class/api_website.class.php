<?php
/* Copyright (C) 2015   Jean-François Ferry     <jfefe@aternatik.fr>
 * Copyright (C) 2019   Cedric Ancelin          <icedo.anc@gmail.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

//use Luracast\Restler\RestException;


require_once DOL_DOCUMENT_ROOT.'/website/class/websitepage.class.php';

/**
 * API class for websites
 *
 * @access protected
 * @class  DolibarrApiAccess {@requires user,external}
 */
class Website extends DolibarrApi
{
	/**
	 * @var WebsitePage $page {@type WebsitePage}
	 */
	public $page;
	/**
	 * Constructor
	 */
	public function __construct()
	{
		global $db, $conf;

		$this->db = $db;
		$this->page = new WebsitePage($this->db);
	}

	/**
	 * Get a page
	 *
	 * @param  int    $id                  ID of product
	 * @return array|mixed                 Data without useless information
	 *
	 * @throws RestException 401
	 * @throws RestException 403
	 * @throws RestException 404
	 */
	public function get($id)
	{
		dol_syslog(get_class($this).'::get', LOG_DEBUG);
		return $this->_fetch($id);
	}

	protected function _cleanObjectDatas($object)
	{
		dol_syslog(get_class($this).'::_cleanObjectDatas', LOG_DEBUG);
		unset($object->statut);

		unset($object->regeximgext);
		unset($object->price_by_qty);
		unset($object->prices_by_qty_id);
		unset($object->libelle);
		unset($object->product_id_already_linked);
		unset($object->reputations);
		unset($object->db);
		unset($object->name);
		unset($object->firstname);
		unset($object->lastname);
		unset($object->civility_id);
		unset($object->contact);
		unset($object->contact_id);
		unset($object->thirdparty);
		unset($object->user);
		unset($object->origin);
		unset($object->origin_id);
		unset($object->fourn_pu);
		unset($object->fourn_price_base_type);
		unset($object->fourn_socid);
		unset($object->ref_fourn);
		unset($object->ref_supplier);
		unset($object->product_fourn_id);
		unset($object->fk_project);

		unset($object->mode_reglement_id);
		unset($object->cond_reglement_id);
		unset($object->demand_reason_id);
		unset($object->transport_mode_id);
		unset($object->cond_reglement);
		unset($object->shipping_method_id);
		unset($object->model_pdf);
		unset($object->note);

		unset($object->nbphoto);
		unset($object->recuperableonly);
		unset($object->multiprices_recuperableonly);
		unset($object->tva_npr);
		unset($object->lines);
		unset($object->fk_bank);
		unset($object->fk_account);
		return $object;
	}

	private function _fetch($id)
	{
		dol_syslog(get_class($this).'::_fetch', LOG_DEBUG);
		if (empty($id)) {
			throw new RestException(400, 'bad value for parameter id');
		}

		$id = (empty($id) ? 0 : $id);

		$result = $this->page->fetch($id);
		if (!$result) {
			throw new RestException(404, 'Page not found');
		}

		return $this->_cleanObjectDatas($this->page);
	}
}

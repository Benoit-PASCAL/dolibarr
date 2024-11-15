<?php
/* Copyright (C) 2010-2018	Laurent Destailleur	<eldy@users.sourceforge.net>
 * Copyright (C) 2012-2021	Regis Houssin		<regis.houssin@inodbox.com>
 * Copyright (C) 2018-2024  Frédéric France     <frederic.france@free.fr>
 * Copyright (C) 2024		MDW							<mdeweerd@users.noreply.github.com>
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


$title = '<span class="opacitymedium">' . $langs->trans(
		"ConfigureHereAttributesVisibility",
		empty($textobject) ? '' : $textobject
	) . '</span><br>' . "\n";

print '<div class="centpercent tagtable marginbottomonly">';
print '<div class="tagtr">';
print '<div class="tagtd inline-block valignmiddle hideonsmartphoneimp">' . $title . '</div>';
print '</div>';
print '</div>';

$object = new Societe($db);

include_once DOL_DOCUMENT_ROOT . '/core/class/html.formsetup.class.php';
$formSetup = new FormSetup($db);

foreach ($object->fields as $field) {
	if ($field['required'] != 1) {
		$item = $formSetup->newItem('MAIN_' . strtoupper($field['label']) . '_FIELD_VISIBILITY')->setAsString();
		$item->nameText = 'Field' . $field['label'];
	}
}

echo $formSetup->generateOutput(true);

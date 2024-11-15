-- ===================================================================
-- Copyright (C) 2012	Laurent Destailleur	<eldy@users.sourceforge.net>
-- Copyright (C) 2016	Regis Houssin		<regis.houssin@inodbox.com>
-- Copyright (C) 2020	Benoît PASCAL <contact@p-ben.com>
--
-- This program is free software; you can redistribute it and/or modify
-- it under the terms of the GNU General Public License as published by
-- the Free Software Foundation; either version 3 of the License, or
-- (at your option) any later version.
--
-- This program is distributed in the hope that it will be useful,
-- but WITHOUT ANY WARRANTY; without even the implied warranty of
-- MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
-- GNU General Public License for more details.
--
-- You should have received a copy of the GNU General Public License
-- along with this program. If not, see <https://www.gnu.org/licenses/>.
--
-- ===================================================================

CREATE TABLE llx_fields
(
    rowid          integer AUTO_INCREMENT PRIMARY KEY,
    name           varchar(64)  NOT NULL,
    entity         integer               DEFAULT 1 NOT NULL,
    elementtype    varchar(64)  NOT NULL DEFAULT 'member',
    label          varchar(255) NOT NULL,
    fieldcomputed  text,
    fielddefault   text,
    fieldunique    integer               DEFAULT 0,
    fieldrequired  integer               DEFAULT 0,
    perms          varchar(255),
    enabled        varchar(255),
    pos            integer               DEFAULT 0,
    alwayseditable integer               DEFAULT 0,
    param          text,
    list           varchar(255)          DEFAULT '1',
    printable      integer               DEFAULT 0,
    totalizable    boolean               DEFAULT FALSE,
    langs          varchar(64),
    help           text,
    css            varchar(128),
    cssview        varchar(128),
    csslist        varchar(128),
    fk_user_modif  integer,
    tms            timestamp             DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=innodb;

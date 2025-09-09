ALTER TABLE `task`
ADD `Supervisor` VARCHAR(50) NULL AFTER `Priority`;

ALTER TABLE `checklist`
ADD `Partrecom` VARCHAR(50) NULL AFTER `Recomended`;

ALTER TABLE `taskdetail`
ADD `Partrecom` VARCHAR(100) NOT NULL AFTER `Engineer`;

ALTER TABLE `task`
CHANGE `Duration` `Duration` TIME(10) NULL DEFAULT NULL;
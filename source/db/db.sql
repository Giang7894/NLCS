create schema recipes;
use recipes;

CREATE TABLE `recipes`.`cong_thuc` (
  `ma_ct` INT NOT NULL AUTO_INCREMENT,
  `ten_ct` VARCHAR(45) NOT NULL,
  `mo_ta` LONGTEXT NOT NULL,
  `dung_cu` LONGTEXT NOT NULL,
  `nguyen_lieu` LONGTEXT NOT NULL,
  `buoc` LONGTEXT NOT NULL,
  PRIMARY KEY (`ma_ct`));
  
  CREATE TABLE `recipes`.`danh_muc` (
  `ma_loai` INT NOT NULL AUTO_INCREMENT,
  `ten_loai` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ma_loai`));
  
  CREATE TABLE `recipes`.`tai_khoan` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ten_tk` VARCHAR(20) NOT NULL,
  `mat_khau` VARCHAR(16) NOT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `recipes`.`chi_tiet_tk` (
  `id` INT NOT NULL,
  `ten_nguoi_dung` VARCHAR(45) NOT NULL,
  `sdt` VARCHAR(10) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `ag`
    FOREIGN KEY (`id`)
    REFERENCES `recipes`.`tai_khoan` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
    
    CREATE TABLE `recipes`.`kho_cong_thuc` (
  `id` INT NOT NULL,
  `so_luong_ct` INT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `nb`
    FOREIGN KEY (`id`)
    REFERENCES `recipes`.`tai_khoan` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

ALTER TABLE `recipes`.`cong_thuc` 
ADD COLUMN `ma_loai` INT NOT NULL AFTER `buoc`,
ADD INDEX `ml_idx` (`ma_loai` ASC) VISIBLE;
;
ALTER TABLE `recipes`.`cong_thuc` 
ADD CONSTRAINT `ml`
  FOREIGN KEY (`ma_loai`)
  REFERENCES `recipes`.`danh_muc` (`ma_loai`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
  
  CREATE TABLE `recipes`.`chi_tiet_kho` (
  `id` INT NOT NULL,
  `ma_ct` INT NOT NULL,
  PRIMARY KEY (`id`, `ma_ct`),
  INDEX `lkllk_idx` (`ma_ct` ASC) VISIBLE,
  CONSTRAINT `kjkj`
    FOREIGN KEY (`id`)
    REFERENCES `recipes`.`kho_cong_thuc` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `lkllk`
    FOREIGN KEY (`ma_ct`)
    REFERENCES `recipes`.`cong_thuc` (`ma_ct`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
    
    CREATE TABLE `recipes`.`binh_luan` (
  `ma_ct` INT NOT NULL,
  `id` INT NOT NULL,
  `ngay_gio` DATETIME NOT NULL,
  `binh_luan` LONGTEXT NOT NULL,
  PRIMARY KEY (`ma_ct`, `id`, `ngay_gio`),
  INDEX `ytyty_idx` (`id` ASC) VISIBLE,
  CONSTRAINT `cfdf`
    FOREIGN KEY (`ma_ct`)
    REFERENCES `recipes`.`cong_thuc` (`ma_ct`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ytyty`
    FOREIGN KEY (`id`)
    REFERENCES `recipes`.`tai_khoan` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE `recipes`.`danh_gia` (
  `ma_ct` INT NOT NULL,
  `id` INT NOT NULL,
  `so_sao` INT NOT NULL,
  PRIMARY KEY (`ma_ct`, `id`));
  
  ALTER TABLE `recipes`.`cong_thuc` 
ADD COLUMN `hinh_anh` LONGTEXT NOT NULL AFTER `ma_loai`;

  ALTER TABLE `recipes`.`binh_luan` 
ADD COLUMN `an` INT NOT NULL ;
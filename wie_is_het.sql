-- -----------------------------------------------------
-- Table `category`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `category` (
  `category_id` INT NOT NULL AUTO_INCREMENT ,
  `category_name` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`category_id`) );



-- -----------------------------------------------------
-- Table `image`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `image` (
  `image_id` INT NOT NULL AUTO_INCREMENT ,
  `image_name` VARCHAR(50) NOT NULL ,
  `image_src` VARCHAR(250) NOT NULL ,
  `image_0_disactivated_1_activated` TINYINT(1) NOT NULL DEFAULT 1 ,
  `image_category_id` INT NOT NULL ,
  PRIMARY KEY (`image_id`) ,
  INDEX `i_category_id_idx` (`image_category_id` ASC) ,
  CONSTRAINT `i_category_id`
    FOREIGN KEY (`image_category_id` )
    REFERENCES `category` (`category_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);



-- -----------------------------------------------------
-- Table `question`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `question` (
  `question_id` INT NOT NULL AUTO_INCREMENT ,
  `question_text` VARCHAR(150) NULL ,
  `question_0_normal_1_category` TINYINT(1) NULL ,
  `question_category_id` INT NOT NULL ,
  PRIMARY KEY (`question_id`) ,
  INDEX `q_category_id_idx` (`question_category_id` ASC) ,
  CONSTRAINT `q_category_id`
    FOREIGN KEY (`question_category_id` )
    REFERENCES `category` (`category_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `property`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `property` (
  `property_id` BIGINT NOT NULL AUTO_INCREMENT ,
  `property_0_no_1_yes` TINYINT(1) NULL ,
  `property_question_id` INT NOT NULL ,
  `property_image_id` INT NOT NULL ,
  PRIMARY KEY (`property_id`) ,
  INDEX `p_question_id_idx` (`property_question_id` ASC) ,
  INDEX `p_image_id_idx` (`property_image_id` ASC) ,
  CONSTRAINT `p_question_id`
    FOREIGN KEY (`property_question_id` )
    REFERENCES `question` (`question_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `p_image_id`
    FOREIGN KEY (`property_image_id` )
    REFERENCES `image` (`image_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


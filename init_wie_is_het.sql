-- -----------------------------------------------------
-- INSERT `category`  initial values
-- -----------------------------------------------------

INSERT INTO category
VALUES
(NULL, 'Persoon'),
(NULL, 'Voorwerp'),
(NULL, 'Dier');


-- -----------------------------------------------------
-- INSERT `question`  initial values
-- -----------------------------------------------------
INSERT INTO question
VALUES
(NULL, 'Is het een persoon?', TRUE, 'Persoon', 1),
(NULL, 'Is het een man?', FALSE, 'Geslacht', 1),
(NULL, 'Is het een vrouw?', FALSE, 'Geslacht', 1),
(NULL, 'Draagt hij/zij een bril?', FALSE, 'Bril', 1),
(NULL, 'Draagt hij/zij een hoofddeksel?', FALSE, 'Hoofddeksel', 1),
(NULL, 'Heeft hij/zij bruine ogen?', FALSE, 'Oogkleur', 1),
(NULL, 'Heeft hij/zij blauwe ogen?', FALSE,'Oogkleur', 1),
(NULL, 'Heeft hij/zij groene ogen?', FALSE,'Oogkleur', 1),
(NULL, 'Is hij/zij helemaal kaal?', FALSE, 'Haar', 1),
(NULL, 'Heeft hij/zij zwart haar?', FALSE, 'Haar', 1),
(NULL, 'Heeft hij/zij bruin haar?', FALSE, 'Haar', 1),
(NULL, 'Heeft hij/zij blond haar?', FALSE, 'Haar', 1),
(NULL, 'Heeft hij/zij rood haar?', FALSE, 'Haar', 1),
(NULL, 'Heeft hij/zij grijs haar?', FALSE, 'Haar', 1),
(NULL, 'Heeft hij/zij een voorwerp vast?', FALSE, 'voorwerp', 1);



DROP PROCEDURE IF EXISTS sp_GetProductAllergenenById;
DELIMITER $$

CREATE PROCEDURE sp_GetProductAllergenenById(
    IN p_id INT
)
BEGIN
    SELECT 
        PDAG.ProductId,
        PROD.Naam AS ProductNaam,
        PROD.Barcode,
        PDAG.AllergeenId,
        ALRG.Naam AS AllergeenNaam,
        ALRG.Omschrijving
    FROM productperallergeen AS PDAG
    INNER JOIN product AS PROD 
        ON PDAG.ProductId = PROD.Id
    INNER JOIN allergeen AS ALRG 
        ON PDAG.AllergeenId = ALRG.Id
    WHERE PDAG.ProductId = p_id
    ORDER BY AllergeenNaam;
END$$

DELIMITER ;

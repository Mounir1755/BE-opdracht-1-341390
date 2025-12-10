DROP PROCEDURE IF EXISTS Sp_CreateNewLevering;

DELIMITER $$

CREATE PROCEDURE Sp_CreateNewLevering(
    IN l_LeverancierId                INT,
    IN l_ProductId                    INT,
    IN l_AantalAanwezig               VARCHAR(255),
    IN l_DatumEerstVolgendeLevering   DATE
)
BEGIN
    INSERT INTO 
        LeverancierId,
        ProductId,
        DatumLevering,
        AantalAanwezig,
        DatumEerstVolgendeLevering
    FROM Leverancier AS LVRN
    WHERE id = l_id;
END$$

DELIMITER ;

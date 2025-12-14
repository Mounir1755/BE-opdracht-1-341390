DROP PROCEDURE IF EXISTS Sp_CreateNewLevering;
DELIMITER $$

CREATE PROCEDURE Sp_CreateNewLevering(
    IN l_LeverancierId              INT,
    IN l_ProductId                  INT,
    IN l_AantalAanwezig             INT,
    IN l_DatumEerstVolgendeLevering DATE
)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
    END;

    START TRANSACTION;

        INSERT INTO productperleverancier
        (
            LeverancierId,
            ProductId,
            DatumLevering,
            AantalAanwezig,
            DatumEerstVolgendeLevering
        )
        VALUES
        (
            l_LeverancierId,
            l_ProductId,
            CURRENT_DATE(),
            l_AantalAanwezig,
            l_DatumEerstVolgendeLevering
        );

        UPDATE magazijn
        SET AantalAanwezig = AantalAanwezig + l_AantalAanwezig
        WHERE ProductId = l_ProductId;

    COMMIT;
END$$

DELIMITER ;

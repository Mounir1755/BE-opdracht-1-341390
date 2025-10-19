DROP PROCEDURE IF EXISTS sp_GetLeveringInfoById;
DELIMITER $$

CREATE PROCEDURE sp_GetLeveringInfoById(
    IN p_id INT
)
BEGIN
    SELECT 
        PDLV.Id AS LeveringId,
        LVRN.Naam AS LeverancierNaam,
        LVRN.ContactPersoon,
        LVRN.LeverancierNummer,
        LVRN.Mobiel,
        PROD.Naam AS ProductNaam,
        MAGA.AantalAanwezig AS MagazijnAantal,
        PDLV.AantalAanwezig AS GeleverdAantal,
        PDLV.DatumLevering,
        PDLV.DatumEerstVolgendeLevering AS VolgendeLevering
    FROM productperleverancier AS PDLV
    INNER JOIN Leverancier AS LVRN 
        ON PDLV.LeverancierId = LVRN.Id
    INNER JOIN Product AS PROD 
        ON PDLV.ProductId = PROD.Id
    INNER JOIN Magazijn AS MAGA
        ON MAGA.ProductId = PROD.Id
    WHERE PDLV.ProductId = p_id
    ORDER BY PDLV.DatumLevering ASC;
END$$

DELIMITER ;

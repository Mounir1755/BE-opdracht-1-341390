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
        PROD.AantalAanwezig AS GeleverdAantal,
        PDLV.DatumLevering,
        PDLV.DatumEerstVolgendeLevering AS VolgendeLevering
    FROM productperleverancier AS PDLV
    INNER JOIN leverancier AS LVRN 
        ON PDLV.LeverancierId = LVRN.Id
    INNER JOIN product AS PROD 
        ON PDLV.ProductId = PROD.Id
    INNER JOIN magazijn AS MAGA
        ON MAGA.ProductId = PROD.Id
    WHERE PDLV.ProductId = p_id
    ORDER BY PDLV.DatumLevering ASC;
END$$

DELIMITER ;

DROP PROCEDURE IF EXISTS Sp_GetAllLeveringInfo

DELIMITER $$

CREATE PROCEDURE Sp_GetAllLeveringInfo()
BEGIN
    SELECT 
		 PDLV.Id
        ,LVRN.Naam AS LeverancierNaam
        ,LVRN.ContactPersoon
        ,LVRN.LeverancierNummer
        ,LVRN.Mobiel
        ,PROD.Naam AS ProductNaam
        ,PDLV.DatumLevering
        ,PDLV.AantalAanwezig
        ,PDLV.DatumEerstVolgendeLevering AS VolgendeLevering
    FROM productperleverancier AS PDLV
    INNER JOIN Leverancier AS LVRN 
        ON PDLV.LeverancierId = LVRN.Id
    INNER JOIN Product AS PROD 
        ON PDLV.ProductId = PROD.Id
    ORDER BY PDLV.Id;
END$$

DELIMITER ;

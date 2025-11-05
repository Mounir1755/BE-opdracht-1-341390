DROP PROCEDURE IF EXISTS sp_GetProductLeveringInfo;

DELIMITER $$

CREATE PROCEDURE sp_GetProductLeveringInfo(
	IN LVRN_id INT
)
BEGIN
    SELECT 
        PROD.Naam AS ProductNaam,
        MAGA.AantalAanwezig,
        MAGA.VerpakkingsEenheidKG,
        PDLV.DatumLevering
    FROM Leverancier AS LVRN
    INNER JOIN productperleverancier AS PDLV 
        ON LVRN.Id = PDLV.LeverancierId
    INNER JOIN product AS PROD 
        ON PDLV.ProductId = PROD.Id
    INNER JOIN magazijn AS MAGA 
        ON PROD.Id = MAGA.ProductId
    WHERE LVRN.Id = LVRN_id
    ORDER BY AantalAanwezig DESC;
END$$

DELIMITER ;

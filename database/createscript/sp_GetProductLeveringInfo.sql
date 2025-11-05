DROP PROCEDURE IF EXISTS Sp_GetProductLeveringInfo;

DELIMITER $$

CREATE PROCEDURE Sp_GetProductLeveringInfo(
    IN p_id INT
)
BEGIN
    SELECT 
        PROD.Naam AS ProductNaam,
        MAX(MAGA.AantalAanwezig) AS AantalAanwezig,
        MAX(MAGA.VerpakkingsEenheidKG) AS VerpakkingsEenheidKG,
        MAX(PDLV.DatumLevering) AS LaatsteLevering
    FROM 
        ProductPerLeverancier AS PDLV
    INNER JOIN 
        Leverancier AS LVRN ON LVRN.Id = PDLV.LeverancierId
    INNER JOIN 
        Product AS PROD ON PROD.Id = PDLV.ProductId
    INNER JOIN 
        Magazijn AS MAGA ON MAGA.ProductId = PROD.Id
    WHERE 
        LVRN.Id = p_id
    GROUP BY 
        PROD.Naam
    ORDER BY 
        LaatsteLevering DESC;
END$$

DELIMITER ;

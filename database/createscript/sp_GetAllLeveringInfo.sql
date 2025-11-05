DROP PROCEDURE IF EXISTS Sp_GetAllLeveringInfo;

DELIMITER $$

CREATE PROCEDURE Sp_GetAllLeveringInfo()
BEGIN
    SELECT 
        LVRN.id,
        LVRN.Naam AS LeverancierNaam,
        LVRN.ContactPersoon,
        LVRN.LeverancierNummer,
        LVRN.Mobiel,
        COUNT(PROD.Id) AS TotaalProducten
    FROM 
        productperleverancier AS PDLV
    INNER JOIN 
        Leverancier AS LVRN 
        ON PDLV.LeverancierId = LVRN.Id
    INNER JOIN 
        Product AS PROD
        ON PDLV.ProductId = PROD.Id
    GROUP BY 
        LVRN.Id, LVRN.Naam, LVRN.ContactPersoon, LVRN.LeverancierNummer, LVRN.Mobiel
    ORDER BY 
        TotaalProducten DESC;
END$$

DELIMITER ;

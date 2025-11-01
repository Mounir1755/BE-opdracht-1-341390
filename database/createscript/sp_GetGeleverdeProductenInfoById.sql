DROP PROCEDURE IF EXISTS sp_GetGeleverdeProductenInfoById;

DELIMITER $$

CREATE PROCEDURE Sp_GetGeleverdeProductenInfoById()
BEGIN
    SELECT 
        LVRN.Naam AS LeverancierNaam,
        LVRN.ContactPersoon,
        LVRN.LeverancierNummer,
        LVRN.Mobiel,
        
    FROM 
        productperleverancier AS PDLV
    INNER JOIN 
        Leverancier AS LVRN ON PDLV.LeverancierId = LVRN.Id
    INNER JOIN 
        Product AS PROD ON PDLV.ProductId = PROD.Id
    GROUP BY 
        LVRN.Id, LVRN.Naam, LVRN.ContactPersoon, LVRN.LeverancierNummer, LVRN.Mobiel
    ORDER BY 
        TotaalProducten DESC;
END$$

DELIMITER ;

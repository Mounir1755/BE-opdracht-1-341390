DROP PROCEDURE IF EXISTS sp_GetLeverancierInfoById;

DELIMITER $$

CREATE PROCEDURE Sp_GetLeverancierInfoById(
	IN l_id INT
)
BEGIN
    SELECT 
        LVRN.Naam AS LeverancierNaam,
        LVRN.ContactPersoon,
        LVRN.LeverancierNummer,
        LVRN.Mobiel
    FROM Leverancier AS LVRN
    WHERE id = l_id;
END$$

DELIMITER ;

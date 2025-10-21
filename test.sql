SELECT
  students_info.Roll_No,
  students_info.Class_No,
  students_info.Name,
  English_Marks,
  Urdu_Marks,
  Maths_Marks,
  Islamyat_Marks,
  Computer_Marks,
  Science_Marks,
  Pashto_Marks,
  History_Marks,
  Mutalia_Marks,
  Arabic_Marks,
  (
    `English_Marks` + `Urdu_Marks` + `Maths_Marks` + `Science_Marks` + `Hpe_Marks` + `Nazira_Marks` + `History_Marks` + `Drawing_Marks` + `Islamyat_Marks` + `Computer_Marks` + `Arabic_Marks` + `Mutalia_Marks` + `Qirat_Marks` + `Pashto_Marks` + `Social_Marks` + `Biology_Marks` + `Chemistry_Marks` + `Physics_Marks` + `Civics_Marks` + `Economics_Marks` + `Islamic_Education_Marks` + `Islamic_Study_Marks` + `Statistics_Marks` + `Geography_Marks`
  ) as instant_total,
  RANK() OVER (
    ORDER BY
      instant_total DESC
  ) as instant_position
FROM
  chitor_db.students_info
  JOIN chitor_db.marks ON chitor_db.students_info.Roll_No = chitor_db.marks.Roll_No
WHERE
  students_info.Class = '7th'
  AND students_info.School = 'GHSS Chitor'
  AND students_info.Status = '1'
order by
  Roll_No ASC
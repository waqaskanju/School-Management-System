const  classes=["6thA","6thB","7th","8th","9thA","9thB","10thA","10thB"];
const  days=["Mon","Tue","Wed","Thu","Fri","Sat"];
const all_teachers=[
    "Amir Zeb",
    "Fazal Hadi",
    "Sherin Buhar",
    "Abdul Wali",
    "Gawhar Ali",
    "Muhammad Ayaz",
    "Rashid Ahmad",
    "Waqas Ahmad",
    "Suliman Khan",
    "Awrang Zeb",
    "Abdul Khabir",
    "Said Kamal",
    "Bacha Mulk",
    "Samiullah Jan",
    "Fazal Akbar",
    "Amin Khan",
    "Abdur Rahman",
    "Noor Ali Shah",
    "Usman"
];

function dayNum(day)
{
    if(day=="Mon") { return 0;}
    else if(day=="Tue") { return 1;}
    else if(day=="Wed") { return 2;}
    else if(day=="Thu") { return 3;}
    else if(day=="Fri") { return 4;}
    else if(day=="Sat") { return 5;}
    else{ return "wrong input";}
}


function teacherNum(teacher)
{
    if(teacher=="Amir Zeb") { return 0;}
    else if(teacher=="Fazal Hadi") { return 1;}
    else if(teacher=="Sherin Buhar") { return 2;}
    else if(teacher=="Abdul Wali") { return 3;}
    else if(teacher=="Gawhar Ali") { return 4;}
    else if(teacher=="Muhammad Ayaz") { return 5;}
    else if(teacher=="Rashid Ahmad") { return 6;}
    else if(teacher=="Waqas Ahmad") { return 7;}
    else if(teacher=="Suliman Khan") { return 8;}
    else if(teacher=="Awrang Zeb") { return 9;}
    else if(teacher=="Abdul Khabir") { return 10;}
    else if(teacher=="Said Kamal") { return 11;}
    else if(teacher=="Bacha Mulk") { return 12;}
    else if(teacher=="Samiullah Jan") { return 13;}
    else if(teacher=="Fazal Akbar") { return 14;}
    else if(teacher=="Amin Khan") { return 15;}
    else if(teacher=="Abdur Rahman") { return 16;}
    else if(teacher=="Noor Ali Shah") { return 17;}
    else if(teacher=="Usman") { return 18;}
    else if(teacher=="Sat") { return 19;}
    else{ return "teacher name wrong input";}
}


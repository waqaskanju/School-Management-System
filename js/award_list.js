// A seperate file is create because it only load with Award list.
function Save_class_subject(){
    let class_name=document.getElementById("class_name").value;
    let subject_name=document.getElementById("subject_name").value;
  
    localStorage.setItem('class_name',class_name);
    localStorage.setItem('subject_name',subject_name);
  }
  
  function Load_class_subject(){
  
    let storage_class_name=localStorage.getItem('class_name');
    let storage_subject_name=localStorage.getItem('subject_name');
    document.getElementById("class_name").value=storage_class_name;
    document.getElementById("subject_name").value=storage_subject_name;
    
  }

    const password=document.getElementById("password");
    const bar=document.getElementById("strengthBar");
    const text=document.getElementById("strengthText");

    password.addEventListener("input",()=>{

    let score=0;
    const value=password.value;

    if(value.length>=8) score++;
    if(/[A-Z]/.test(value)) score++;
    if(/[0-9]/.test(value)) score++;
    if(/[^A-Za-z0-9]/.test(value)) score++;

    switch(score){

    case 1:
    bar.style.width="25%";
    bar.className="progress-bar bg-danger";
    text.innerHTML="Faible";
    break;

    case 2:
    bar.style.width="50%";
    bar.className="progress-bar bg-warning";
    text.innerHTML="Moyen";
    break;

    case 3:
    bar.style.width="75%";
    bar.className="progress-bar bg-info";
    text.innerHTML="Fort";
    break;

    case 4:
    bar.style.width="100%";
    bar.className="progress-bar bg-success";
    text.innerHTML="Très fort";
    break;

    default:
    bar.style.width="0";
    text.innerHTML="";
}

});

    const toggle=document.getElementById("togglePassword");

    toggle.onclick=()=>{

    password.type=password.type==="password"?"text":"password";

    toggle.innerHTML=password.type==="password"
    ?'<i class="bi bi-eye"></i>'
    :'<i class="bi bi-eye-slash"></i>';

}


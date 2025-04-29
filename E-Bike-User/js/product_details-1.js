var flag = true;  
function commentform() {  
    var cform = `<form action="queries.php" method="post">
        Enter Name:<br><input type='text' name='name' required/><br/>
        Enter Email:<br><input type='email' name='email' required/><br>
        Enter Mobile No.:<br><input type='number' name='number' required/><br>
        Enter Product Name.:<br><input type='text' name='product_name' required/><br>
        Enter Any Question:<br/><textarea name='question' rows='5' cols='70' required ></textarea><br>
        <input type='submit' name="submit" value='Post Comment'/></form>`;  
    if (flag) {  
        document.getElementById("mylocation").innerHTML = cform;  
        flag = false;  
    } else {  
        document.getElementById("mylocation").innerHTML = "";  
        flag = true;  
    }  
}  

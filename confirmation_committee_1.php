<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Committee</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet" />
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Poppins, sans-serif;
        /* background-color: rgb(62, 66, 163); */
    }

    .contentBx{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }
    .confirmation{
        width: 580px;
        margin: 180px auto;
        color: white;
        padding: 30px;
        border-radius: 15px;
        justify-content: center;
        background-color: rgb(62, 66, 163);
    }

    .confirmation form{
        text-align: center;
        flex-wrap: wrap;
        justify-content: center;
    }

    .confirmation form h4{
        margin-top: 10px;
        margin-bottom: 50px;
        text-align: center;
        font-weight: normal;
    }

    .confirmation form .club{
        margin-bottom: 20px;
        justify-content: center;
    }

    .confirmation form .club span {
        font-size: 16px;
        margin-bottom: 5px;
        display: inline-block;
        color: #fff;
        font-weight: 300;
        font-size: 16px;
    }

    .confirmation form .club select {
        width: 100%;
        height: 30px;
        background-color: #fff;
        border: 1px solid #fff;
        border-radius: 10px;
        box-shadow: 2px 2px 5px black;
    }

    .confirmation form .club select option {
        width: 100%;
        height: 30px;
        background-color: #fff;
        border: 1px solid #fff;
        border-radius: 10px;
        box-shadow: 2px 2px 2px black;
    }

    .confirmation form .inputBx{
        margin-bottom: 20px;
    }

    .confirmation form .inputBx span{
        font-size: 16px;
        margin-bottom: 5px;
        display: inline-block;
        color: #fff;
        font-weight: 300;
        font-size: 16px;
    }

    .confirmation form .inputBx input{
        width: 46%;
        height: 30px;
        padding: 5px 10px;
        font-size: 14px;
        font-weight: 400;
        letter-spacing: 1px;
        outline: none;
        background-color: #fff;
        border: 1px solid #fff;
        border-radius: 10px;
        box-shadow: 2px 2px 2px black;
    }

    .confirmation form .inputBx input[type="submit"]{
        background: rgb(41, 167, 20);
        height: 30px;
        width: 100px;
        color: white;
        outline: none;
        border: none;
        border-radius: 20px;
        font-weight: normal;
        cursor: pointer;
        text-align: center;
        letter-spacing: 1px;
    }
</style>
<body>
    <div class="contentBx">
        <div class="confirmation">
            <form action="server/process_confirmation_com.php" method="post">
                <h4>Are you a committee member? <br> Please enter club name and matric number</h4>
                <div class="inputBx">
                    <span>Club Name : &nbsp;</span>
                    <input type="text" id="club_name" name="club_name">
                </div>
                <!-- <div class="club" id="filters">
                    <span>Club Name : &nbsp; &nbsp; &nbsp; &nbsp;</span>
                    <select name="fetchval" id="fetchval" style="width: 180px">
                        <option value="" disabled="" selected="">&nbsp; Choose club name</option>
                        <option value="GPS">&nbsp; GPS</option>
                        <option value="GO-KART">&nbsp; GO-KART</option>
                    </select>
                </div> -->
                <div class="inputBx">
                    <span>Matric No. : &nbsp; &nbsp;</span>
                    <input type="text" id="matric_no" name="matric_no">
                </div>
                <div class="inputBx">
                    <input type="submit" id="btn" value="SUBMIT" name="login">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
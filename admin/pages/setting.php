<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<style>

    .container{
        padding: 0;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        
} 
    

    .box{
        width: 500px;
        height: 300px;
        background-color: #e7717d;
        position: relative;

    }
    .box::before {
        content:"";
        background-color: #e7717d;
        border: 30px solid white;
        border-radius: 100%;
        width: 50px;
        height:50px;
        left:-60px;
        top:-60px;
        position: absolute;
    }
</style>
    <div class="container">    
        <div class="box">
     </div> 
</div>
</body>
</html>
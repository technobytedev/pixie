<style type="text/css">*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}
html,body{
    width:100%;
    height:100%;
}
:root{
    --white:#fff;
    --smoke-white:#f1f3f5;
    --blue:#4169e1;
}

.selector{
    position:relative;
    width:60%;
    background-color:var(--smoke-white);
    height:80px;
    display:flex;
    justify-content:space-around;
    align-items:center;
    border-radius:9999px;
    box-shadow:0 0 16px rgba(0,0,0,.2);
}
/*.selecotr-item{
    position:relative;
    flex-basis:calc(70% / 3);
    height:100%;
    display:flex;
    justify-content:center;
    align-items:center;
    width: 30px!important;
}*/
.selector-item_radio{
    appearance:none;
    display:none;
        width: 30px!important;

}
.selector-item_label{
    position:relative;
   
    
    text-align:center;
    border-radius:9999px;
    font-weight:900;
    transition-duration:.5s;
    transition-property:transform, color, box-shadow;
    transform:none;
    width: auto;
    height: auto;
    padding: 5px;

}
.selector-item_radio:checked + .selector-item_label{
    background-color:var(--blue);
    color:var(--white);
    box-shadow:0 0 4px rgba(0,0,0,.5),0 2px 4px rgba(0,0,0,.5);
    transform:translateY(-2px);

}
@media (max-width:480px) {
    .selector{
        width: 90%;
          margin: 10px!important;
    }
}</style>
            <div class="selecotr-item" style="margin:20px">
            <input type="radio" id="radio1" name="selector" class="selector-item_radio" >
            <label for="radio1" class="selector-item_label">C</label>
        </div>

         <div class="selecotr-item">
            <input type="radio" id="radio9" name="selector" class="selector-item_radio" >
            <label for="radio9" class="selector-item_label">D</label>
        </div>
        <div class="selecotr-item">
            <input type="radio" id="radio2" name="selector" class="selector-item_radio">
            <label for="radio2" class="selector-item_label">A</label>
        </div>
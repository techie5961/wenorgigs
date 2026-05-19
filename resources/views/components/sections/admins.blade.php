@isset($css_var)
    <style class="css">
        :root{
             /* primary hsl number */
    --primary-hsl:247;
    /* primary color */
      --primary:rgb(108,92,230);
      /* primary rgb */
      --primary-rgb:108,92,230;
      }
      .cont{
    width:100%;
    height:50px;
    border:1px solid var(--rgt-01);
    border-radius:5px;
    display:flex;
    flex-direction:row;
    align-items:center;
    overflow:hidden;
    background:transparent;
    padding:0;
}
div:has(.cont) label{
    font-weight:900;
}

.cont:has(textarea){
    min-height:200px !important;
}
.cont .inp{
    width:100%;
    height:100%;
    border:none;
    background:transparent;
    border-radius:inherit;
    font-weight:900;

}
     
    </style>
@endisset
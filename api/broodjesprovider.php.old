<?php
function getBroodjes(){
    return array(
        Broodje::new("Broodje kaas",explode(", ", "kaas, mayo, ei, tomaat, komkommer, sla, wortel"),"3.40","https://www.managejekanker.nl/wp-content/uploads/2016/04/broodje-kaas-1.jpg"),
        Broodje::new("Broodje mozarella extra",explode(", ", "mozzarella, pesto, olijven, zongedroogde tomaten, rucola"),"3.70","https://www.managejekanker.nl/wp-content/uploads/2016/04/broodje-kaas-1.jpg"),
        Broodje::new("Broodje brie noten",explode(", ", "Brie, honing, noten, sla"),"3.70","https://f.jwwb.nl/public/m/y/q/temp-wnpqzwvhamcdljawxeam/0xhh3j/broodjebriehoningnoten.png"),
        Broodje::new("Broodje geitenkaas appel",explode(", ", "geitenkaas, honing, pijnboompitten, appel, sla"),"3.90","https://i0.wp.com/etenmetroos.nl/wp-content/uploads/2017/08/geit.jpg?resize=900%2C450"),
        Broodje::new("Broodje ham",explode(", ", "ham, ei, tomaat, komkommer, sla, wortel, mayo"),"3.50","https://www.hoogerbrugcuisine.nl/foto/47/1000/files/Afbeeldingen/zacht_wit_broodje_ham.jpg"),
        Broodje::new("Broodje prepare",explode(", ", "Preparé, ei, tomaat, komkommer, wortel, sla, mayo"),"3.50","https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzlRVEki80bEoRsSmxrJ906aBQqudVtnKHsg&usqp=CAU"),
        Broodje::new("Broodje kippenwit",explode(", ", "kippenwit, ei, tomaat, komkommer, sla, wortel, mayo"),"3.60","https://broodjes-jipsy.be/wp-content/uploads/2014/08/Broodjes_Jipsy.jpg"),
        Broodje::new("Broodje club",explode(", ", "préparé, augurk, tomaat, verse ui, sla, tartaarsaus"),"3.70","https://bakkerijaernoudt.be/sites/default/files/styles/large/public/club_00004.jpg?itok=xctOugAl"),
        Broodje::new("Broodje smoske",explode(", ", "ham, kaas, ei, tomaat, komkommer, sla, wortel, mayo"),"3.60","https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Dagobert_au_jmbon_et_crudit%C3%A9s.jpg/266px-Dagobert_au_jmbon_et_crudit%C3%A9s.jpg"),
        Broodje::new("Broodje martino",explode(", ", "préparé, augurk, ansjovis, zilveruitjes, tomaat, tabasco, sla, martinosaus"),"3.70","https://i2.wp.com/www.seasonwithlove.nl/wp-content/uploads/2014/11/broodjemartino.jpg?fit=1000%2C669&ssl=1")
    );
}
function getSalades(){
    return array(
        Broodje::new("Griekse salade ",explode(", ", "basis + feta kaas, ui, olijven, paprika, rucola"),"7.00","https://www.leukerecepten.nl/wp-content/uploads/2019/07/griekse-salade_v.jpg"),
        Broodje::new("Kipsalade ",explode(", ", "basis + pasta, kippenblokjes, rode ui, olijven, kersttomaten"),"7.60","https://i0.wp.com/kitchenista.nl/wp-content/uploads/2017/01/kipsalade.jpg?resize=600%2C320&ssl=1"),
        Broodje::new("Salade Nicoise ",explode(", ", "basis+ tonijn natuur, ui, paprika, ansjovis, bieslookdressing"),"8.00","https://img-3.journaldesfemmes.fr/8COrhFruV2keguuWQqaL0SoViws=/748x499/smart/3a86b25b4fd94561959d9ff592bce391/recipe-jdf/10025061.jpg")
    );
}
class Broodje {
    public static function new($name, $ingredients, $price, $image){
        $broodje = new Broodje();
        $broodje->name = $name;
        $broodje->ingredients = $ingredients;
        if(!empty($price)) {$broodje->price = $price;}
        $broodje->image = $image;
        $broodje->ingredientListHtml = "- ".implode("<br>- ", $broodje->ingredients);
        $broodje->csv = $name.",".$price." EUR";
        return $broodje;
    }
    public $name;
    public $ingredients;
    public $image;
    public $price="0.00";
    public $ingredientListHtml;
    public $csv;
}
?>
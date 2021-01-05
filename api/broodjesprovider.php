<?php
function getBroodjes(){
    return array(
        Broodje::new("Broodje kaas","3.40","https://www.managejekanker.nl/wp-content/uploads/2016/04/broodje-kaas-1.jpg"),
        Broodje::new("Broodje mozarella extra","3.70","https://www.managejekanker.nl/wp-content/uploads/2016/04/broodje-kaas-1.jpg"),
        Broodje::new("Broodje brie noten","3.70","https://f.jwwb.nl/public/m/y/q/temp-wnpqzwvhamcdljawxeam/0xhh3j/broodjebriehoningnoten.png"),
        Broodje::new("Broodje geitenkaas appel","3.90","https://i0.wp.com/etenmetroos.nl/wp-content/uploads/2017/08/geit.jpg?resize=900%2C450"),
        Broodje::new("Broodje ham","3.50","https://www.hoogerbrugcuisine.nl/foto/47/1000/files/Afbeeldingen/zacht_wit_broodje_ham.jpg"),
        Broodje::new("Broodje prepare","3.50","https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzlRVEki80bEoRsSmxrJ906aBQqudVtnKHsg&usqp=CAU"),
        Broodje::new("Broodje kippenwit","3.60","https://broodjes-jipsy.be/wp-content/uploads/2014/08/Broodjes_Jipsy.jpg"),
        Broodje::new("Broodje club","3.70","https://bakkerijaernoudt.be/sites/default/files/styles/large/public/club_00004.jpg?itok=xctOugAl"),
        Broodje::new("Broodje smoske","3.60","https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Dagobert_au_jmbon_et_crudit%C3%A9s.jpg/266px-Dagobert_au_jmbon_et_crudit%C3%A9s.jpg"),
        Broodje::new("Broodje martino","3.70","https://i2.wp.com/www.seasonwithlove.nl/wp-content/uploads/2014/11/broodjemartino.jpg?fit=1000%2C669&ssl=1")
    );
}
function getSalades(){
    return array(
        Broodje::new("Griekse salade ","7.00","https://www.leukerecepten.nl/wp-content/uploads/2019/07/griekse-salade_v.jpg"),
        Broodje::new("Kipsalade ","7.60","https://i0.wp.com/kitchenista.nl/wp-content/uploads/2017/01/kipsalade.jpg?resize=600%2C320&ssl=1"),
        Broodje::new("Salade Nicoise ","8.00","https://img-3.journaldesfemmes.fr/8COrhFruV2keguuWQqaL0SoViws=/748x499/smart/3a86b25b4fd94561959d9ff592bce391/recipe-jdf/10025061.jpg")
    );
}
class Broodje {
    public static function new($name, $price, $image){
        $broodje = new Broodje();
        $broodje->name = $name;
        if(!empty($price)) {$broodje->price = $price;}
        $broodje->image = $image;
        $broodje->csv = $name.",".$price." EUR";
        return $broodje;
    }
    public $name;
    public $image;
    public $price="0.00";
    public $csv;
}
?>
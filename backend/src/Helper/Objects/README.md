```php
DynamicSetter::set($productCatalog, $data, [], ['parameters_ul']);
```

`$productCatalog` - obyektdir. new ProductCatalog();

`$data` - set olunacaq melumatlarin massividir. key => value olaraq saxlanilir.
keyler set olunacaq obyektin metodlari ile eyni olmalidir. eger obyektde setName() metodu varsa
data massivinin icinde [name => value] seklinde saxlanilmalidir.

`Ucuncu arqument` keyleri override etmek ucundur. misal ucun data massivinde 
"ad" keyi var. lakin bu "ad" obyektin "name" metoduna set olunmalidir.
ucuncu arqumente array seklinde otururuk. ['ad' => 'name']

`dorduncu arqument` de array qebul edir. set olunmasini istemediyini key leri bura yaziriq.
["lastname", "age"] bu array otursek data icinde olan lastname ve age keyleri set olunmayacaq


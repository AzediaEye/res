<!DOCTYPE html>
<html lang="en">

<head>
    @include("home.partials.head")
</head>

<body>
    @include("home.partials.preloader")
    @include("home.partials.header", ['navdata' => $navdata])


    @include("food.partials.food", ['fooddata' => $fooddata, 'foodBg' => 'assets/images/food-bg.png'])






    @include("home.partials.footer")

    @include("home.partials.script")
</body>

</html>
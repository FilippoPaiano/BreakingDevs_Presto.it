<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->string('nameEN');
            $table->string('nameES');
            
            $table->timestamps();
        });
        
        $categories = [
            ['Motori','Motors','Motores'], 
            ['Informatica', 'Informatic', 'Informatica'],
            ['Elettrodomestici', 'Home appliances', 'Electrodomesticos'],
            ['Libri', 'Books', 'Libros'],
            ['Giochi', 'Games', 'Juegos'],
            ['Sport', 'Sport', 'Deporte'],
            ['Immobili', 'Real Estate', 'Immobiles'],
            ['Abbigliamento', 'Clothing', 'Ropa'],
            ['Arredamento', 'Furniture', 'Muebles'],
            ['Musica', 'Music', 'Música']
        ];

        foreach($categories as $category){
            Category::create([
                'name'=>$category[0],
                'nameEN'=>$category[1],
                'nameES'=>$category[2]
            ]);
        }
    }
    
    
    
    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};

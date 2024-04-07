<?php

namespace App\Models;

use App\Models\Tva;
use App\Models\Unite;
use App\Models\Marque;
use App\Models\Categorie;
use App\Models\Typearticle;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    use LogsActivity;
    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;

    protected $fillable = [
       'reference', 'designation', 'description', 'prixachat','prixvente', 'categorie_id','photo','inactif',
       'stockmini','stockmaxi','stockseuil','unite_id','tva_id','typearticle_id','marque_id','modele_id'
    ];

    public function getPhotourlAttribute()
    {
        if(Storage::exists($this->photo))
            return Storage::url($this->photo);
        else return null;
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function typearticle()
    {
        return $this->belongsTo(Typearticle::class);
    }

    public function tva()
    {
        return $this->belongsTo(Tva::class);
    }

    public function unite()
    {
        return $this->belongsTo(Unite::class);
    }

    public function marque()
    {
        return $this->belongsTo(Marque::class);
    }

}

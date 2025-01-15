<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Visite extends Model
{
    public const _DEFAULT_ = 0;
    public const _START_ = 1;
    public const _END_ = 2;
    public const _REPORTTER_ = 3;

    protected $fillable = [
        'user_id',
        'medecin_id',
        'pharmacie_id',
        'para_pharmacie_id',
        'ville_id',
        'date',
        'start_date',
        'start_position_geo',
        'cancel_date',
        'cancel_position_geo',
        'end_date',
        'end_position_geo',
        'end_note',
        'end_photos',
        'reporter_date',
        'reporter_position_geo',
        'reporter_note',
        'reporter_next_date',
        'etat',
    ];

    protected $casts = [
        'date' => 'datetime',
        'start_date' => 'datetime',
        'cancel_date' => 'datetime',
        'end_date' => 'datetime',
        'reporter_date' => 'datetime',
        'reporter_next_date' => 'date',
    ];

    /* -------------------------------------------------------------------------- */
    /*                                  ATTRIBUTE                                 */
    /* -------------------------------------------------------------------------- */

    public function setEndPhotosAttribute($pictures)
    {
        if (is_array($pictures)) {
            $this->attributes['end_photos'] = json_encode($pictures);
        }
    }

    public function getEndPhotosAttribute($pictures)
    {
        return is_array(json_decode($pictures, true)) ? json_decode($pictures, true) : array();
    }

    public function getUserName(){
        return $this->user ? $this->user->name : "";
    }

    public function getMedecinName(){
        return $this->medecin ? $this->medecin->nom.' '.$this->medecin->prenom : "";
    }
    public function getMedecinPosition(){
        return $this->medecin ? array("latitude"=>$this->medecin->latitude,"longitude"=>$this->medecin->longitude) : "";
    }

    public function getMedecinImage(){
        // dd($this->medecin->photos);


        if($this->medecin && is_array($this->medecin->photos) && count($this->medecin->photos) > 0 ){
            return $this->medecin->photos[0];
        }
        return "https://via.placeholder.com/500x400";
        // return $this->medecin ? $this->medecin->nom.' '.$this->medecin->prenom : "";
    }

    public function getAdminBgColor(){
        switch ($this->etat) {
            case Self::_DEFAULT_:
                return "";
                break;
            case Self::_START_:
                return "label-info";
                break;
            case Self::_END_:
                return "label-success";
                break;
            case Self::_REPORTTER_:
                return "label-warning";
                break;

            default:
                return "";
                break;
        }
    }

    public function getAdminRowBgColor(){
        switch ($this->etat) {
            case Self::_DEFAULT_:
                return "";
                break;
            case Self::_START_:
                return "info";
                break;
            case Self::_END_:
                return "success";
                break;
            case Self::_REPORTTER_:
                return "warning";
                break;

            default:
                return "";
                break;
        }
    }
    public function getEtatName(){
        switch ($this->etat) {
            case Self::_DEFAULT_:
                return "En attente";
                break;
            case Self::_START_:
                return "Commencé";
                break;
            case Self::_END_:
                return "Terminé";
                break;
            case Self::_REPORTTER_:
                return "Reporté";
                break;

            default:
                return "En attente";
                break;
        }
    }

    public function start_distance(){
        if($this->start_position_geo){
            $user_lat = $this->start_position_geo['latitude'] ? (float)$this->start_position_geo['latitude'] : 0;
            $user_long = $this->start_position_geo['Longitude'] ?  (float)$this->start_position_geo['Longitude'] : 0;
            if($this->medecin){
                $medecin_lat = $this->medecin->latitude ? (float)$this->medecin->latitude : 0;
                $medecin_long = $this->medecin->longitude ? (float)$this->medecin->longitude : 0;
            }else{
                $medecin_lat =  0;
                $medecin_long = 0;
            }


            if(is_numeric($user_lat) && is_numeric($user_long) && is_numeric($medecin_lat) && is_numeric($medecin_long)){
                $distance = distance($user_lat, $user_long, $medecin_lat, $medecin_long, "M");

                if($distance <= 30 ){
                    return "<span class='label label-success'>".number_format((float)$distance, 2, '.', '')." M</span>";
                }

                if($distance > 30 && $distance<=50){
                    return "<span class='label label-warning'>".number_format((float)$distance, 2, '.', '')." M</span>";
                }

                if($distance > 50){
                    return "<span class='label label-danger'>".number_format((float)$distance, 2, '.', '')." M</span>";
                }
            }
        }

        return "";
    }
    public function end_distance(){
        if($this->end_position_geo){
            $user_lat = $this->end_position_geo['latitude'] ? (float)$this->end_position_geo['latitude'] : 0;
            $user_long = $this->end_position_geo['Longitude'] ?  (float)$this->end_position_geo['Longitude'] : 0;

            if($this->medecin){
                $medecin_lat = $this->medecin->latitude ? (float)$this->medecin->latitude : 0;
                $medecin_long = $this->medecin->longitude ? (float)$this->medecin->longitude : 0;
            }else{
                $medecin_lat =  0;
                $medecin_long = 0;
            }

            if(is_numeric($user_lat) && is_numeric($user_long) && is_numeric($medecin_lat) && is_numeric($medecin_long)){
                $distance = distance($user_lat, $user_long, $medecin_lat, $medecin_long, "M");

                if($distance <= 30 ){
                    return "<span class='label label-success'>".number_format((float)$distance, 2, '.', '')." M</span>";
                }

                if($distance > 30 && $distance<=50){
                    return "<span class='label label-warning'>".number_format((float)$distance, 2, '.', '')." M</span>";
                }

                if($distance > 50){
                    return "<span class='label label-danger'>".number_format((float)$distance, 2, '.', '')." M</span>";
                }
            }
        }
    }

    public function cancel_distance(){
        if($this->cancel_position_geo){
            $user_lat = $this->cancel_position_geo['latitude'] ? (float)$this->cancel_position_geo['latitude'] : 0;
            $user_long = $this->cancel_position_geo['Longitude'] ?  (float)$this->cancel_position_geo['Longitude'] : 0;

            if($this->medecin){
                $medecin_lat = $this->medecin->latitude ? (float)$this->medecin->latitude : 0;
                $medecin_long = $this->medecin->longitude ? (float)$this->medecin->longitude : 0;
            }else{
                $medecin_lat =  0;
                $medecin_long = 0;
            }

            if(is_numeric($user_lat) && is_numeric($user_long) && is_numeric($medecin_lat) && is_numeric($medecin_long)){
                $distance = distance($user_lat, $user_long, $medecin_lat, $medecin_long, "M");

                if($distance <= 30 ){
                    return "<span class='label label-success'>".number_format((float)$distance, 2, '.', '')." M</span>";
                }

                if($distance > 30 && $distance<=50){
                    return "<span class='label label-warning'>".number_format((float)$distance, 2, '.', '')." M</span>";
                }

                if($distance > 50){
                    return "<span class='label label-danger'>".number_format((float)$distance, 2, '.', '')." M</span>";
                }
            }
        }
    }

    public function reporter_distance(){
        if($this->reporter_position_geo){
            $user_lat = $this->reporter_position_geo['latitude'] ? (float)$this->reporter_position_geo['latitude'] : 0;
            $user_long = $this->reporter_position_geo['Longitude'] ?  (float)$this->reporter_position_geo['Longitude'] : 0;

            if($this->medecin){
                $medecin_lat = $this->medecin->latitude ? (float)$this->medecin->latitude : 0;
                $medecin_long = $this->medecin->longitude ? (float)$this->medecin->longitude : 0;
            }else{
                $medecin_lat =  0;
                $medecin_long = 0;
            }

            if(is_numeric($user_lat) && is_numeric($user_long) && is_numeric($medecin_lat) && is_numeric($medecin_long)){
                $distance = distance($user_lat, $user_long, $medecin_lat, $medecin_long, "M");

                if($distance <= 30 ){
                    return "<span class='label label-success'>".number_format((float)$distance, 2, '.', '')." M</span>";
                }

                if($distance > 30 && $distance<=50){
                    return "<span class='label label-warning'>".number_format((float)$distance, 2, '.', '')." M</span>";
                }

                if($distance > 50){
                    return "<span class='label label-danger'>".number_format((float)$distance, 2, '.', '')." M</span>";
                }
            }
        }
    }

    public function start_map(){
        if(!is_array($this->start_position_geo) || !$this->medecin) return null;
        $medecin = $this->medecin;
        return "https://www.google.com/maps/dir/".$this->start_position_geo['latitude'].",".$this->start_position_geo['Longitude']."/".$medecin->latitude.",".$medecin->longitude;
    }

    public function cancel_map(){
        if(!is_array($this->cancel_position_geo) || !$this->medecin) return null;
        $medecin = $this->medecin;
        return "https://www.google.com/maps/dir/".$this->cancel_position_geo['latitude'].",".$this->cancel_position_geo['Longitude']."/".$medecin->latitude.",".$medecin->longitude;
    }
    public function end_map(){
        if(!is_array($this->end_position_geo) || !$this->medecin) return null;
        $medecin = $this->medecin;
        return "https://www.google.com/maps/dir/".$this->end_position_geo['latitude'].",".$this->end_position_geo['Longitude']."/".$medecin->latitude.",".$medecin->longitude;
    }

    public function reporter_map(){
        if(!is_array($this->reporter_position_geo) || !$this->medecin) return null;
        $medecin = $this->medecin;
        return "https://www.google.com/maps/dir/".$this->reporter_position_geo['latitude'].",".$this->reporter_position_geo['Longitude']."/".$medecin->latitude.",".$medecin->longitude;
    }

    /* -------------------------------------------------------------------------- */
    /*                                RELATIONSHIP                                */
    /* -------------------------------------------------------------------------- */

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function medecin(): BelongsTo
    {
        return $this->belongsTo(Medecin::class);
    }

    public function pharmacie(): BelongsTo
    {
        return $this->belongsTo(Pharmacie::class);
    }

    public function para_pharmacie(): BelongsTo
    {
        return $this->belongsTo(ParaPharmacie::class);
    }

    public function ville(): BelongsTo
    {
        return $this->belongsTo(Ville::class);
    }
    /* -------------------------------------------------------------------------- */
    /*                                     API                                    */
    /* -------------------------------------------------------------------------- */

    public function agendaItem(){
        return [
            "visite_id"=>$this->id,
            "medecin"=>$this->medecin,
        ];
    }
}

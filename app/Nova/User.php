<?php

namespace App\Nova;

use App\Nova\Filters\TimeFilter;
use App\Nova\Filters\UserFilter;
use Laravel\Nova\Auth\PasswordValidationRules;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Models\User as UserModel;

class User extends Resource
{
    use PasswordValidationRules;

    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\User>
     */
    public static $model = UserModel::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name', 'email',
    ];

    public static function label() {
        return __('Délégués');
    }
    /**
     * Get the fields displayed by the resource.
     *
     * @return array<int, \Laravel\Nova\Fields\Field|\Laravel\Nova\Panel|\Laravel\Nova\ResourceTool|\Illuminate\Http\Resources\MergeValue>
     */
    public function fields(NovaRequest $request): array
    {
        return [
            Text::make('Name', 'name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Email', 'email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}'),

            Password::make('Password', 'password')
                ->onlyOnForms()
                ->creationRules($this->passwordRules())
                ->updateRules($this->optionalPasswordRules()),

            Text::make('User Name', 'username')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Cin', 'cin')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Phone', 'phone')
                ->rules('required', 'max:255'),

            Image::make('Photo', 'photo')
                ->rules('nullable', 'image'),

            Date::make('Date of Birth', 'date_naissance')
                ->sortable()
                ->hideFromIndex(),

            Date::make('Hiring Date', 'date_embauche')
                ->sortable()
                ->hideFromIndex(),

            Boolean::make('Listing Permission', 'listing_permision'),

            Boolean::make('Add Medecin Permission', 'add_medecin_permision'),

            BelongsToMany::make('Villes', 'villes', VilleResource::class),
            BelongsToMany::make('Secteurs', 'secteures', SecteurResource::class),

            HasMany::make('medecins', 'medecins', MediPharmaResource::class),
            HasMany::make('visites', 'visites', VisiteResource::class),
            HasMany::make('historiques', 'historiques', HistoriqueResource::class),

//            Number::make('Total Visits', function () {
//                return $this->countVisites;
//            })->onlyOnDetail(),
//
//            Number::make('Visits Today', function () {
//                return $this->countVisitesPrevueToday();
//            })->onlyOnDetail(),
//
//            Number::make('Coverage Rate Last Week', function () {
//                return $this->tauxCouvertureLastWeek();
//            })->onlyOnDetail(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @return array<int, \Laravel\Nova\Card>
     */
    public function cards(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array<int, \Laravel\Nova\Filters\Filter>
     */
    public function filters(NovaRequest $request): array
    {
        return [
            new UserFilter(),
            new TimeFilter(),
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array<int, \Laravel\Nova\Lenses\Lens>
     */
    public function lenses(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array<int, \Laravel\Nova\Actions\Action>
     */
    public function actions(NovaRequest $request): array
    {
        return [];
    }
}

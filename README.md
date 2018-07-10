### Laravel User Credits Package

The purpose of this package is for you to be able to easily apply a 
credit based system to your existing Laravel Application.

For example : if you want to create a site that people must purchase credits 
in order to purchase items on the site, this package will make it easy for you to do.


To get started follow these steps: 


*Install the package using composer*

`composer require iamjaime/credits --dev`
 
 
Then go to your config/app directory and add the following to the providers array:

`Iamjaime\Credits\UserCreditServiceProvider::class`

Now you must run the migrations....

`php artisan migrate` 

Now go to your User's Model and add the following line at the top:

`use Iamjaime\Credits\Traits\UsesCredits;`


then add the following line inside your class : 

`use UsesCredits;`


Your Model should now look something like this : 

```
<?php
  
  namespace App;
  
  use Illuminate\Notifications\Notifiable;
  use Illuminate\Foundation\Auth\User as Authenticatable;
  use Iamjaime\Credits\Traits\UsesCredits;
  
  class User extends Authenticatable
  {
      use Notifiable, UsesCredits;
  
      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
          'name', 'email', 'password',
      ];
  
      /**
       * The attributes that should be hidden for arrays.
       *
       * @var array
       */
      protected $hidden = [
          'password', 'remember_token',
      ];
  }
```



##### If you are using Laravel Spark you will need to do the following :
*Go to App/Providers/EventServiceProvider.php and add the following to the `protected $listen` array:*
```
'Laravel\Spark\Events\Auth\UserRegistered' => [
            'Iamjaime\Credits\Listeners\UserRegistered'
        ],

```




#### Now you are all setup and ready to go!

##### Some examples Below :


*The following snippet will return the user object with the user's credits.*

```
$user = App\User::where('id', '=', 1)->with('credit')->first();

//These are the user's credits....
$credits = $user->credit->amount;

```


*Here is an example of how to update the user's credits.*

```
$user = App\User::where('id', '=', 1)->first();

$user->updateCredits(500);

```



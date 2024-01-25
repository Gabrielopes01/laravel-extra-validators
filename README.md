# Laravel Extra Validatiors

This package has some extra Validations to Laravel Request's, if you want to use any validator you need to extend on your app service provider adding this line inside the boot function:

```
use Gabrielopes01\LaravelExtraValidators\ExistsLike;

public function boot()
{
    Validator::extend(ExistsLike::handle(), ExistsLike::class);
}
```

## Exists Like
- Add this code line on boot:

```
Validator::extend(ExistsLike::handle(), ExistsLike::class);
```

- This validation you can check if the field has a similar value on a specific table/collum, like the example:

```
'field_req' => 'exists_like:Namespace\Class,collum_name'
```

## Post
- Add this code line on boot:

```
Validator::extend(Post::handle(), Post::class);
```

- This validation will exclude the specific value of the request data if the request method doesn't match, like the example:

```
'field_num' => 'post'
```

## Put
- Add this code line on boot:

```
Validator::extend(Put::handle(), Put::class);
```

- This validation will exclude the specific value of the request data if the request method doesn't match, like the example:

```
'field_num' => 'put'
```

## Delete
- Add this code line on boot:

```
Validator::extend(Delete::handle(), Delete::class);
```

- This validation will exclude the specific value of the request data if the request method doesn't match, like the example:

```
'field_num' => 'delete'
```
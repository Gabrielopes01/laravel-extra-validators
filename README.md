# Laravel Extra Validatiors

This package has some extra Validations to Laravel Request's, if you want to use any validator you need to extend on your app service provider adding this line inside the boot function:

```
public function boot()
{
    Validator::extend(ExistsLike::handle(), ExistsLike::class);
}
```

## Exists Like

- This validation you can check if the field has a similar value on a specific table/collum, like the example:

```
'field_req' => 'exists_like:Namespace\Class,collum_name'
```
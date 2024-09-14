from django.http import JsonResponse

def is_login(fun):
    def wrapper(request, *args, **kwargs):
        if request.user.is_authenticated:
            return fun(request, *args, **kwargs)
        return JsonResponse({"no": 56448})
    return wrapper
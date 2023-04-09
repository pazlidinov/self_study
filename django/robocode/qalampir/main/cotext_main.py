from .models import Category


def context_main(request):
    category = Category.objects.all()
    data = {
        'categories': category
    }
    return data

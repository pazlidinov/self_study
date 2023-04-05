from .models import Category


def main_context(request):
    category = Category.objects.all()
    context = {
        'categories': category
    }
    return context

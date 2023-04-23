from django.shortcuts import render

from .models import Category

# Create your views here.


def homePage(request):
    cat=Category.objects.all()
    return render(request, 'index.html', context={'categories':cat})

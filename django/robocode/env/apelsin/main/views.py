from django.shortcuts import render
from .models import Category, Product
# Create your views here.

def homePageView(request):
    products=Product.objects.all()
    categories=Category.objects.all()
    data={
        'products': products,
        'categories':categories,
    }
    return render(request, 'index.html', context=data)

def apelsinsPageView(request):
    return render(request, 'apelsins.html')

def orderPageView(request):
    return render(request, 'order.html')
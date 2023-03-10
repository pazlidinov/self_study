from django.shortcuts import render

# Create your views here.

def homePageView(request):
    return render(request, 'index.html')

def apelsinsPageView(request):
    return render(request, 'apelsins.html')

def orderPageView(request):
    return render(request, 'order.html')
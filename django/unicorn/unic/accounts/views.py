from django.shortcuts import render, redirect
from django.contrib.auth import login, logout
# Create your views here.


def loggin(request):
    # login(request,request.user)
    return render(request, 'index.html')


def loggout(request):
    logout(request)
    return render(request, 'index.html')

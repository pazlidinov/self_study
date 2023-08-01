from django.shortcuts import render , HttpResponse , redirect
from django.contrib import  messages
from django.contrib.auth import login, authenticate
from .models import Leed_user
from .forms import LeedUserForm
# Create your views here.
def questions(request):
    return render(request , 'quiz.html')
def home_page(request):
    return render(request , 'index.html')
def Add_leed_user(request):
    if request.method == "POST":
        form =  LeedUserForm(request.POST)
        if form.is_valid():
            f = form.save(commit=False)
            f.save()
            messages.add_message(request, messages.SUCCESS, 'ROYXATDAN OTILDI')
            return redirect('/register/questions')
        else:
            messages.add_message(request, messages.ERROR, 'FORMA XATO TOLDIRILDI')
            return redirect('/')
def LoginView(request):
    if request.method == "POST":
        username = request.POST.get('username')
        password = request.POST.get('password')
        print(username)
        print(password)
        user = authenticate(username=username,password=password)
        
        if user is not None:
            login(request, user)
            print('ok')
            return redirect('/register/profile')
        else:
            print('no')
            return HttpResponse('error')
def ProfileView(request):
    return render(request , 'profile.html')
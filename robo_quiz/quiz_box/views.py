from django.shortcuts import render
from .models import *
# Create your views here.

def home_page(request):
    all_quiz = Quiz.objects.all()
    data = {
        'all_quizs':all_quiz
    }
    return render(request , 'index.html' , context=data)

def quiz_page_view(request):
    return render(request , 'quiz.html')
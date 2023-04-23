from django.shortcuts import render
from django.views.generic import View

from .models import Player

# Create your views here.


class Players_Home_View(View):
    model = Player
    template_name='player.html'

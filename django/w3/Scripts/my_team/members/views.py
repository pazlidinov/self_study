from django.http import HttpResponse
from django.shortcuts import render
from django.template import loader
from django.db.models import Q

from .models import Members


def members(request):
    mymembers = Members.objects.all().values()
    template = loader.get_template('all_members.html')
    context = {
        "mymembers": mymembers,
    }
    return HttpResponse(template.render(context, request))


def details(request, id):
    mymembers = Members.objects.get(id=id)
    template = loader.get_template('details.html')
    context = {
        "mymember": mymembers,
    }
    return HttpResponse(template.render(context, request))


def main(request):
    template = loader.get_template('index.html')
    return HttpResponse(template.render())


def testing(request):
    mydata = Members.objects.filter(Q(id=1) | Q(id=3))
    template = loader.get_template('test.html')
    context = {
        'mymembers': mydata,
    }
    return HttpResponse(template.render(context, request))

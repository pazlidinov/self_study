from django.shortcuts import render
from django.http import JsonResponse
from rest_framework import viewsets
from rest_framework.response import Response
from rest_framework.decorators import action
from .serializers import ProfileSerializers
from .models import Profile
from rest_framework.permissions import AllowAny
from .decarators import is_login

# Create your views here.


class ProfileViewset(viewsets.ModelViewSet):
    queryset = Profile.objects.all()
    serializer_class = ProfileSerializers
    # permission_classes=[]

    def list(self, request, *args, **kwargs):
        qs = Profile.objects.filter(is_main=False)
        serializer = ProfileSerializers(qs, many=True)
        return Response(serializer.data)

    def destroy(self, request, *args, **kwargs):
        id = kwargs["pk"]
        qs = Profile.objects.get(id=id)
        qs.is_active = False
        qs.save()
        return Response({"Succses "})

    @action(methods=["get"], detail=True)
    def new_func(self, request, pk):
        return Response({"key": 1545})


@is_login
def index(request):
    return JsonResponse({"ok": 56448})

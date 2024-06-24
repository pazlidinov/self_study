from django.shortcuts import render
from rest_framework.views import APIView, Response
from .models import Post
from .serializers import PostSerializer

# Create your views here.


class PostListView(APIView):

    def get(self, request):
        posts = Post.objects.all()
        serializer = PostSerializer(posts, many=True)
        return Response(serializer.data)

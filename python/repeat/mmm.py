# # 10
# a=int(input('a...'))
# b=int(input('b...'))

# s=0
# if a!=b:
#     s=a+b
# print(s)
# print(a,b)
    
    
# 13
# a=int(input('a...'))
# b=int(input('b...'))
# d=int(input('d...'))
# s=0
# e=0
# if a>b:
#     s=a
#     e=b
# else:
#     s=b
#     e=a
    
    
# if s>d and e<d:
#     print(d)
# elif s<d:
#     print(s)
# else:
#     print(e)


# 17
# a=int(input('a...'))
# b=int(input('b...'))
# d=int(input('d...'))

# if (a>b and b>d) or (a<b and b<d):
#     print(2*a, 2*b, 2*d)
# else:
#     print(a*(-1), b*(-1), d*(-1))
    
# 1 and 1
# 0 or 0
# not 0
# 1 and 0 or 0

# 11,12,18,22,24,25,26
 
# 11
# n=int(input('n..'))
# s=0
# for i in range(n, 2*n+1):
#     s+=i*i  #s=n*n+(n+1)*(n+1)
#     print(s)
# print(s)
# 12
# n=int(input('n..'))
# s=1
# k=1.1
# for i in range(n):
#     s=s*k
#     k=k+0.1
# # s=1.1*1.2*1.3*1.4*1.5*1.6*1.7*1.8*1.9*2=67.0442572800002
# print(s)


# 18
# n=int(input('n...'))
# a=int(input('a...'))
# s=0
# for i in range(n+1):
#    s=s+((-1)**i)* (a**i) #0+1-a+a2-a3
# print(s)

# 22
# n=int(input('n...'))
# x=int(input('x...'))
# # 4!=1*2*3*4
# s=1
# for i in range(1, n+1):
#     f=1
#     for j in range(1,i+1):
#         f*=j#1*2*3*4..
#     s=s+(x**i)/f
    
# print(s)

# 39
a=int(input('a..'))
b=int(input('b..'))
n=1
for i in range(a,b):    
    for j in range(n):    
        print(i)
    n+=1

# print([i for i in range(int(input('a..')), int(input('b...'))) for j in range(i)])
